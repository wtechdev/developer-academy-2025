<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    const N_ELEMENT_PAGE = 10;

    /**
     * Mostra l'elenco degli utenti.
     * @return Renderable
     */
    public function index(): Renderable
    {
        $users = User::orderBy("created_at", "Desc")
            ->paginate(self::N_ELEMENT_PAGE);
        return \view('user.index')->with([
            "users" => $users,
        ]);
    }

    /**
     * Mostra il form di creazione di un nuovo utente.
     * @param  Request  $request
     * @return Renderable
     */
    public function create(Request $request): Renderable
    {
        $old = $request->old();

        $field = [
            "name" => "",
            "email" => "",
            "password" => "",
        ];
        $field = array_merge($field, $old);

        return \view('user.create-edit')->with([
            "route" => "user.store",
            "azione" => "create",
            "campi" => $field,
        ]);
    }

    /**
     * Salva i dati dell'utente ricevuti dal form.
     * @param  UserRequest  $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            // Creo l'utente
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
            ]);
            return \back()->with("success", "Utente creato con successo");
        } catch (Exception $error) {
            Log::error('Errore salvataggio utente',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return \back()->with("alert", "Errore creazione utente");
    }

    /**
     * Mostra il singolo utente.
     * @param  string  $id
     * @return Renderable
     */
    public function show(string $id): Renderable
    {
        $user = User::findOrFail($id);
        return \view('user.show')->with([
            "user" => $user,
        ]);
    }

    /**
     * Mostra il form di creazione di un nuovo utente.
     * @param  string  $id
     * @param  Request  $request
     * @return Renderable
     */
    public function edit(string $id, Request $request): Renderable
    {
        $old = $request->old();

        $user = User::find($id);
        if ($user === null) {
            $user = [
                "name" => "",
                "email" => "",
                "password" => "",
            ];
        } else {
            $field = [
                "name" => $user->name,
                "email" => $user->email,
                "password" => "",
            ];
        }

        $field = array_merge($field, $old);

        return \view('user.create-edit')->with([
            "route" => "user.update",
            "azione" => "edit",
            "campi" => $field,
            "id_user" => $id,
            "user" => $user,
        ]);
    }

    /**
     * Modifica i dati dell'utente ricevuti dal form
     * @param  UserRequest  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, string $id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return \back()->with("success", "Utente modificato con successo");
        } catch (Exception $error) {
            Log::error('Errore modifica utente',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return \back()->with("alert", "Errore modifica utente");
    }

    /**
     * Elimina l'utente con l'id passato
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return \back()->with("success", "Utente eliminato con successo");
        } catch (Exception $error) {
            Log::error('Errore eliminazione utente',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return \back()->with("alert", "Errore eliminazione utente");
    }
}
