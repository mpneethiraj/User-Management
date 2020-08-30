<?php
/**
 * PHP Version 7.1.32
 * Common functions throughout the application
 *
 * @category  File
 * @package   Customer Activities
 * @author    P Neethi Rajan <pneethirajan003@gmail.com>
 * @copyright pneethirajan003@gmail.com
 * @link      Link
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\CustomerModel;
use Redirect;


/**
 * Class contain common functions throughout the application
 *
 * @category  Class
 * @package   Customer
 * @author    P Neethi Rajan <pneethirajan003@gmail.com>
 * @copyright pneethirajan003@gmail.com
 * @link      Link
 */

class CustomerManageController extends Controller
{
    
    /**
     * Function to get the customer details and display
     *
     * @param Request $request user request input
     *
     * @return A view file to display the customer information
    */
    public function getCustomerList(Request $request){

        try{
            $customerList = CustomerModel::Select('id','name','status','email_address','telephone')->get()->toArray();

           
            return view('manage-customer/customerList', compact('customerList'));

        }catch (Exception $e) {
            
        }
    	
    	
    }
    /**
     * Function to get the customer form and display
     *
     * @param Request $request user request input
     *
     * @return A view file to display the customer form information
    */
    public function getCustomerForm(Request $request){
        try{
        	$customerList = $this->getColumnTable('customer');
            $isAdd = true;
        	$id = '';
        	return view('manage-customer/customerForm', compact('customerList','isAdd','id'));
        }catch (Exception $e) {
            
        }
    }
    /**
     * Function to save the customer information
     *
     * @param Request $request customer details request input
     *
     * @return A view file to display the customer form information
    */
    public function saveCustomerForm(Request $request){
    	
        try{
        	$validator = Validator::make(
                $request->all(),
                [
                'Name' => 'required',
                'username' => 'unique:customer,username',
                'email' => 'unique:customer,email_address',
                'mobile_number' => 'required|regex:/[0-9]{9}/',
                'password' => 'required| min:5',
                'date_of_birth' => 'required|date',
                'city' => 'required',
                'state' => 'required',
                'Country' => 'required',
                'address' => 'required',
                ],
                [
                'Name.required' => 'Name is required',
                'username.unique' => 'Username not available',
                'email.unique' => 'Email address already in used',
                'password.required' => 'Password is required',
                'date_of_birth.required'=> 'Date of birth must be date',
                'city.required' => 'City is required',
                'state.required' => 'State is required',
                'Country.required' => 'Country is required',
                'address.required' => 'Address is required',
                ]
            );
    
        // Stop if validation fails
            if ($validator->fails()) {
                if($request->input('type') != ""){
                    return Redirect::back()->withErrors($validator)->withInput();
                }else{
                    return redirect('customer-form')->withErrors($validator)->withInput();
                }
            	
            }
            //dd($request->all());
            if($request->input('type') != ""){
                $customer = CustomerModel::where('id', $request->input('type'))->first();

                $customer->name             = $request->input('Name');
                $customer->status           = 2;
                $customer->username         = $request->input('username');
                $customer->email_address    = $request->input('email');
                $customer->password         = $request->input('password');
                $customer->telephone        = $request->input('mobile_number');
                $customer->date_of_birth    = $request->input('date_of_birth');
                $customer->profile_photo    = "";
                $customer->city             = $request->input('city');
                $customer->state            = $request->input('state');
                $customer->country          = $request->input('Country');
                $customer->address          = $request->input('address');
                $customer->save();
            }else{
                $customer = new CustomerModel;
                $customer->name             = $request->input('Name');
                $customer->status           = 1;
                $customer->username         = $request->input('username');
                $customer->email_address    = $request->input('email');
                $customer->password         = $request->input('password');
                $customer->telephone        = $request->input('mobile_number');
                $customer->date_of_birth    = $request->input('date_of_birth');
                $customer->profile_photo    = "";
                $customer->city             = $request->input('city');
                $customer->state            = $request->input('state');
                $customer->country          = $request->input('Country');
                $customer->address          = $request->input('address');
                $customer->save();
            }
            

        	$customerList = CustomerModel::Select('id','name','status','email_address','telephone')->get()->toArray();
        	return view('manage-customer/customerList',compact('customerList'));

        }catch (Exception $e) {
           
        }

    }
    /**
     * Function to get the customer data by id
     *
     * @param Request $request user request input, id
     *
     * @return A edit file to display the customer form information
    */
    public function getCustomerIndex(Request $request, $id){
        try{
        	$customerList = CustomerModel::where('id',$id)->first()->toArray();
            $isAdd = false;
        	return view('manage-customer/customerForm',compact('customerList','isAdd','id'));

        }catch (Exception $e) {
            
        }

    }
    /**
     * Function to delete the customer entry by id (Actual is changing the status)
     *
     * @param Request $request user request input and id
     *
     * @return A view file to customer list 
    */
    public function getCustomerDelete(Request $request, $id){

        try{
        
        CustomerModel::where('id', $id)->delete($id);

    	$customerList = CustomerModel::Select('id','name','status','email_address','telephone')->get()->toArray();
    	
    	return view('manage-customer/customerList', compact('customerList'));
        }catch (Exception $e) {
            
        }

    }
    /**
     * Function to get the table column name  by name
     *
     * @param Table name
     *
     * @return table column object with empty value
    */
    static public function getColumnTable($table)
    {
        $columns = array();
        $prefix  = \DB::getTablePrefix();
        foreach (\DB::select("SHOW COLUMNS FROM $prefix$table") as $column) {
           //print_r($column);
            $columns[$column->Field] = '';
        }
      
        //$object = (object) $columns;
        return $columns;
    }

    
}
