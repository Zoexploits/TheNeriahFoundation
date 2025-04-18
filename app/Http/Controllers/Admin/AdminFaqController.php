<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function create_submit(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->back()->with('success', 'FAQ created successfully.');


    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function edit_submit(Request $request, $id){

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::findOrFail($id);

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->update();
        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function delete($id){

        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }
}
