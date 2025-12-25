<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%");
            });
        }

        if ($request->filled('profession')) {
            $query->where('profession', 'like', '%' . $request->profession . '%');
        }
        if ($request->filled('company')) {
            $query->where('company', 'like', '%' . $request->company . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $members = $query->paginate(10);

        return view('members.index', compact('members'));
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }


    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'profession' => 'required',
            'linkedin_url' => 'nullable|url',
        ]);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member added!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'profession' => 'required',
            'linkedin_url' => 'nullable|url',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated!');
    }

    public function export()
    {
        $members = Member::all();
        $headers = ['Content-Type' => 'text/csv'];
        $callback = function () use ($members) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Name', 'Email', 'Profession', 'Company', 'Status']);
            foreach ($members as $m) {
                fputcsv($file, [$m->name, $m->email, $m->profession, $m->company, $m->status]);
            }
            fclose($file);
        };
        return response()->streamDownload($callback, 'members.csv', $headers);
    }


    public function destroy($id)
    {
        Member::findOrFail($id)->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted!');
    }
}
