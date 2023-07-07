<?php

namespace App\Http\Controllers;

use App\Models\PaymentGateway;
use App\Models\RatingCategory;
use App\Models\TaxRates;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Function to view Settigns page
    public function viewSettings()
    {
        return view('pages.admin.settings.settings');
    }

    // Function to view settings for discounts
    public function viewDiscounts()
    {
        return view('pages.admin.settings.discounts');
    }

    // Function to view settings for payment methods
    public function viewPaymentGateways()
    {
        $gateways = PaymentGateway::all();
        $data = compact('gateways');
        return view('pages.admin.settings.payment_gateways')->with($data);
    }

    // Function to view Edit Payment Gateways
    public function viewEditPaymentGateway($id)
    {
        $gateway = PaymentGateway::find($id);
        $data = compact('gateway');
        return view('pages.admin.settings.edit_payment_gateways')->with($data);
    }

    // Function to view settings for tax rates
    public function viewTaxRates()
    {
        $rates = TaxRates::all();
        $data = compact('rates');
        return view('pages.admin.settings.tax_rates')->with($data);
    }

    // Function to add tax rates
    public function doAddTaxRates(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'location_id' => 'required'
        ]);
        $tax = new TaxRates();
        $tax->name = $request->name;
        $tax->rate = $request->rate;
        $tax->tax_rate_location_id = $request->location_id;
        $tax->compound = $request->compound_tax ? 1 : 0;
        $tax->save();
        return redirect()->route('settings.tax.rates')->with(['msg' => 'Tax Rate Added Successfully', 'type' => 'success']);
    }

    // Function to view Add Tax Rates
    public function viewAddTaxRates(){
        return view('pages.admin.settings.add_tax_rates');
    }

    // Function to view Edit Tax rates
    public function viewEditTaxRates($id)
    {
        $rate = TaxRates::find($id);
        $data = compact('rate');
        return view('pages.admin.settings.edit_tax_rates')->with($data);
    }

    // Function to do Edit Tax rates
    public function doEditTaxRates(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'location_id' => 'required'
        ]);
        $tax = TaxRates::find($id);
        $tax->name = $request->name;
        $tax->rate = $request->rate;
        $tax->tax_rate_location_id = $request->location_id;
        $tax->compound = $request->compound_tax ? 1 : 0;
        $tax->save();
        return redirect()->route('settings.tax.rates')->with(['msg' => 'Tax Rate Updated Successfully', 'type' => 'success']);
    }

    // Function to delete tax rates
    public function doDeleteTaxRate($id)
    {
        $tax = TaxRates::find($id);
        $tax->delete();
        return redirect()->route('settings.tax.rates')->with(['msg', 'Tax Rate Deleted Successfully', 'type' => 'success']);
    }

    // Function to view settings for language
    public function viewLanguage()
    {
        return view('pages.admin.settings.language');
    }

    // Function to view settings for upload types
    public function viewUploadTypes()
    {
        return view('pages.admin.settings.upload_types');
    }

    // Function to view settings for rating categories
    public function viewRatingCategories()
    {
        $categories = RatingCategory::all();
        $data = compact('categories');
        return view('pages.admin.settings.rating_categories')->with($data);
    }

    // Function to view Add Rating Categories
    public function viewAddRatingCategories()
    {
        return view('pages.admin.settings.add_rating_categories');
    }

    // Function to do Add Rating Categories
    public function doAddRatingCategories(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        $category = new RatingCategory();
        $category->name = $request->name;
        $category->description = $request->description ? $request->description : '';
        $category->save();
        return redirect()->route('settings.rating.categories')->with(['msg', 'Rating Category Added Successfully', 'type' => 'success']);
    }

    // Function to view Edit Rating Categories
    public function viewEditRatingCategories($id)
    {
        $category = RatingCategory::find($id);
        $data = compact('category');
        return view('pages.admin.settings.edit_rating_categories')->with($data);
    }

    // Function to do Edit Rating Categories
    public function doEditRatingCategories(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        $category = RatingCategory::find($id);
        $category->name = $request->name;
        $category->description = $request->description ? $request->description : '';
        $category->save();
        return redirect()->route('settings.rating.categories')->with(['msg', 'Rating Category Updated Successfully', 'type' => 'success']);
    }

    // Function to delete rating categories
    public function doDeleteRatingCategories($id)
    {
        $category = RatingCategory::find($id);
        $category->delete();
        return redirect()->route('settings.rating.categories')->with(['msg', 'Rating Category Deleted Successfully', 'type' => 'success']);
    }

    // Function to view settings for scheduled tasks
    public function viewScheduledTasks()
    {
        return view('pages.admin.settings.scheduled_tasks');
    }

    // Function to do Edit Payment Gateways
    public function doEditPaymentGateway(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        echo "<pre>";
        $gateway = PaymentGateway::find($id);
        $settings = array($gateway->settings);
        foreach ($settings as $key) {
            foreach ($key as $k => $v) {
                $settings[$k] = $request->$k;
            }
        }
        // Unset the first element of the array which is JSON String
        unset($settings[0]);

        // Check if sandbox mode is checked
        if($request->has('sandbox_mode')){
            $settings['sandbox_mode'] = 1;
        }else{
            $settings['sandbox_mode'] = 0;
        }

        // Update the payment gateway
        if ($gateway) {
            $gateway->name = $request->name;
            $gateway->is_active = $request->is_active ? 1 : 0;
            $gateway->description = $request->description ? $request->description : '';
            $gateway->settings = $settings;
            $gateway->save();
            return redirect()->route('settings.payment.gateways')->with(['msg', 'Payment Gateway Updated Successfully', 'type' => 'success']);
        }
    }
}
