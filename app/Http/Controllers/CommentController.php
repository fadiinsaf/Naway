<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::withTrashed()->with('user')->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'entity_id' => 'required|integer',
            'entity_type' => 'required|string',
        ]);

        $isAdmin = \Illuminate\Support\Facades\Auth::user()->role === 'admin';
        $validated['user_id'] = \Illuminate\Support\Facades\Auth::id();
        $validated['approved'] = $isAdmin;

        Comment::create($validated);

        $message = $isAdmin ? 'Comment posted successfully.' : 'Thank you! Your comment has been submitted and is pending review by our moderator';
        return redirect()->back()->with('success', $message);
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return redirect()->back()->with('success', 'Comment approved successfully.');
    }

    public function userUpdate(Request $request, Comment $comment)
    {
        if ($comment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $isAdmin = \Illuminate\Support\Facades\Auth::user()->role === 'admin';
        $comment->update([
            'content' => $validated['content'],
            'approved' => $isAdmin,
        ]);

        $message = $isAdmin ? 'Comment updated successfully.' : 'Your comment has been updated and is pending review.';
        return redirect()->back()->with('success', $message);
    }

    public function userDestroy(Comment $comment)
    {
        if ($comment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Your comment has been deleted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
