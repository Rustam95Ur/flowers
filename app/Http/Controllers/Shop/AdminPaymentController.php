<?php

namespace App\Http\Controllers\Shop;

use App\Models\Clients\Client;
use App\Models\Clients\Payment;
use Illuminate\Http\JsonResponse;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class AdminPaymentController extends VoyagerBaseController
{
    /**
     * Update BREAD.
     *
     * @param Request $request
     * @param number                   $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }
        $client = Client::where('phone', $request['customer_phone'])->first();
        if($request['payment_type'] == 'offline' and $client and $request['status'])
        {
            $bonus = new BonusController();
            $payment = Payment::where('id', $request['id'])->first();
            if((int) $request['status'] == 1) {
                $bonus->add_payment_bonus($client->id, $payment);
            }elseif ((int) $request['status'] == 2) {
                $bonus->deactivate_used_bonus($payment->id);
            }
        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
}
