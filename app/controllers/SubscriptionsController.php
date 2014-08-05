<?php

use Carbon\Carbon as Cb;
class SubscriptionsController extends \BaseController {

	/**
	 * Display a listing of subscriptions
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = Client::with(['services'])->get()->toArray();

        return View::make('subscriptions.index', compact('clients'));

	}

	/**
	 * Show the form for creating a new subscription
	 *
	 * @return Response
	 */
	public function create()
	{
        $services = Service::all(['name', 'id'])->toArray();
        //fetches name from the array ...
        $services = array_fetch($services, 'name');
//        dd($services);
		return View::make('subscriptions.create', compact('services'));
	}

	/**
	 * Store a newly created subscription in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//		$validator = Validator::make($data = Input::all(), Subscription::$rules);

//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}
//		Subscription::create($data);

        $serviceId = Input::get('service_name');
//        $clientName = Client::findOrNew(null,['name' => Input::get('client_name')]);
        $clientName = Client::firstOrCreate(['name' => Input::get('client_name')]);
        if($clientName instanceof \Illuminate\Database\Eloquent\Model ){
            $clientName->save();
            $clientName->services()->sync([intval($serviceId+1) ]);
            $period = 0;
            switch(intval(Input::get('period'))){
                case 1:
                    $period = Cb::now()->addMonth();
                    break;
                case 6:
                    $period = Cb::now()->addMonths(6);
                    break;
                case 12:
                    $period = Cb::now()->addMonths(12);
                    break;

            }
        $clientName->services()->updateExistingPivot(intval($serviceId+1), [ 'expires_at' => $period ]);

        }
        return Redirect::route('subscriptions.index');
	}

	/**
	 * Display the specified subscription.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//		$subscription = Subscription::findOrFail($id);

		return View::make('subscriptions.show', compact('subscription'));
	}

	/**
	 * Show the form for editing the specified subscription.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
//		$subscription = Subscription::find($id);

		return View::make('subscriptions.edit', compact('subscription'));
	}

	/**
	 * Update the specified subscription in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
//		$subscription = Subscription::findOrFail($id);

//		$validator = Validator::make($data = Input::all(), Subscription::$rules);
//
//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}
//
//		$subscription->update($data);

		return Redirect::route('subscriptions.index');
	}

	/**
	 * Remove the specified subscription from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
//		Subscription::destroy($id);

		return Redirect::route('subscriptions.index');
	}

}
