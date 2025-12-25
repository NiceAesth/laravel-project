<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index(Member $member)
    {
        $stories = $member->successStories()->latest()->paginate(10);
        return view('success_stories.index', compact('member', 'stories'));
    }

    public function allIndex()
    {
        $stories = SuccessStory::with('member')
            ->latest()
            ->paginate(10);

        return view('success_stories.all', compact('stories'));
    }

    public function show(Member $member, SuccessStory $success_story)
    {
        abort_unless($success_story->member_id === $member->id, 404);

        return view('success_stories.show', [
            'member' => $member,
            'story' => $success_story,
        ]);
    }

    public function create(Member $member)
    {
        return view('success_stories.create', compact('member'));
    }

    public function store(Request $request, Member $member)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
        ]);

        $member->successStories()->create($request->all());

        return redirect()
            ->route('members.success-stories.index', $member)
            ->with('success', 'Success story added!');
    }

    public function edit(Member $member, SuccessStory $success_story)
    {
        // Safety: ensure story belongs to member
        abort_unless($success_story->member_id === $member->id, 404);

        return view('success_stories.edit', [
            'member' => $member,
            'story' => $success_story,
        ]);
    }

    public function update(Request $request, Member $member, SuccessStory $success_story)
    {
        abort_unless($success_story->member_id === $member->id, 404);

        $request->validate([
            'title' => 'required|string|max:255',
            'story' => 'required|string',
        ]);

        $success_story->update($request->all());

        return redirect()
            ->route('members.success-stories.index', $member)
            ->with('success', 'Success story updated!');
    }

    public function destroy(Member $member, SuccessStory $success_story)
    {
        abort_unless($success_story->member_id === $member->id, 404);

        $success_story->delete();

        return redirect()
            ->route('members.success-stories.index', $member)
            ->with('success', 'Success story deleted!');
    }
}
