<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFeedbackRequest $request
     * @return Response
     */
    public function store(StoreFeedbackRequest $request)
    {
        $feedback = Feedback::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $this->notification($feedback);

        return back()->with('message', 'Спасибо, заявка на бронирование принята, мы перезвоним в ближайшее времяы');
    }

    /**
     * Display the specified resource.
     *
     * @param  Feedback  $feedback
     *
     * @return Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feedback  $feedback
     *
     * @return Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Feedback $feedback
     *
     * @return Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback $feedback
     *
     * @return Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }

    private function notification(Feedback $feedback)
    {
        Mail::to(env('MAIL', 'chelbeh@gmail.com'))->send(new FeedbackMail($feedback));
    }
}
