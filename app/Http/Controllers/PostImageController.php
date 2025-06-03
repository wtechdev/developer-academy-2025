<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Log;

class PostImageController extends Controller
{
    /**
     * @param  string  $post_id
     * @return RedirectResponse
     */
    public function destroy(string $post_id): RedirectResponse
    {
        try {
            // Trova il post
            $post = Post::findOrFail($post_id);

            // Verifica se ha un media nella collezione 'immagine'
            if ($post->hasMedia('immagine')) {
                // Recupera il media (essendo singleFile(), c'è al massimo 1 media)
                $media = $post->getFirstMedia('immagine');

                // Elimina il media (file fisico + record DB)
                if ($media !== null) {
                    $media->delete();
                }

                return back()->with('success', 'Immagine del post eliminata');
            }

            return back()->with('alert', 'Nessuna immagine associata al post');
        } catch (Exception $error) {
            Log::error('Errore eliminazione immagine post',
                [
                    'error' => $error->getMessage(),
                    'trace' => $error->getTraceAsString(),
                ]);
        }
        return back()->with('alert', 'Errore eliminazione immagine post');
    }
}
