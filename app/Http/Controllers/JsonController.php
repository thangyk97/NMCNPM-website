<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Employee;
use App\Order;
use App\ExportReceipt;
use App\ImportReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Session;

class JsonController extends Controller
{
    /**
     * Get all orders to app java
     * Return: json string
     */
    public function getOrders() 
    {
        $orders = Order::all()->first();

        $ordersArray = $orders->toArray();

        echo json_encode($ordersArray);        
    }

    public function getCart() 
    {
        $orders = Order::all();

        $result = array();

        $cart = array();

        foreach ($orders as $order)
        {

            $carts = DB::table('cart')->get()->where('id_order', $order['id']);

            $cart_of_order = array();

            foreach ($carts as $cart)
            {
                $product = Product::where('id', $cart->id_product)->get()->first();

                $content = array("id"=>$product['id'], "name"=>$product['name'], "price"=>$product['price'], "total"=>$cart->amount);

                $cart_of_order[] = $content;
            }

            $order['cart'] = $cart_of_order;

            $result[] = $order;

        }
        
        echo json_encode($result);
    }

    public function changeStatus(Request $request)
    {
        $data = json_decode($request->data);

        foreach ($data as $order)
        {
            $order_db = Order::where('id',$order->id)->update(['status'=>$order->status]);
        }
        
    }

    public function getJsonProducts(Request $request)
    {
        $products = Product::all();
        
        echo json_encode($products);
    }

    public function getJsonEmployees()
    {
        $employees = DB::table('employee')->get();

        echo json_encode($employees);
    }

    public function getJsonExportReceiptes()
    {
        $export_receiptes = DB::table('export_receipt')->get();
        $result = array();
        foreach ($export_receiptes as $temp)
        {
            $arr = array();
            $items = DB::table('receipt_item')->where('id_receipt', $temp->id_receipt)->get();
            foreach ($items as $item)
            {
                $product = Product::where('id', $item->id_product)->first();
                $arr[] = $product;
            }
            $employee = Employee::where('id', $temp->id_employee)->first();

            $temp = (array) $temp;
            $temp["item"] = $arr;
            $temp["employee"] = $employee;
            
            

            $result[] = $temp;
        }




        echo json_encode($result);
    }

    public function getJsonImportReceiptes()
    {
        $result = array();
        $import_receiptes = DB::table('receipt_manager_supplier')->get();
        
        foreach ($import_receiptes as $temp)
        {
            $arr = array();
            $items = DB::table('import_receipt')->where('id_receipt', $temp->id_receipt)->get();
            foreach ($items as $item)
            {
                $product = Product::where('id', $item->id_product)->first();
                $arr[] = $product;      
            }
            $supplier = DB::table('supplier')->where('id', $temp->id_supplier)->first();

            $employee_manager = DB::table('employee_manager')->where('id_manager', $temp->id_manager)->first();

            $manager = Employee::where('id', $temp->id_manager)->first();

            $manager["commission"] = $employee_manager->commission;

            $temp = (array) $temp;
            $temp["items"] = $arr;
            $temp["importer"] = $manager;
            $temp["supplier"] = $supplier;

            $result[] = $temp;

        }



        echo json_encode($result);        
    }

    public function saveJsonProducts(Request $request)
    {
        $products = json_decode($request->data);

        foreach ($products as $product)
        {
            $product_db = new Product();
            $product_db->name = $product->name;
            $product_db->price = $product->price;
            $product_db->total = $product->total;
            $product_db->type = $product->type;
            $product_db->save();
           
        }
    }

    public function updateJsonProducts(Request $request)
    {
        $products = json_decode($request->data);

        foreach ($products as $product)
        {
            $product_db = Product::where('id', $product->id);
            $product_db->update([
                'name'=> $product->name,
                'price'=> $product->price,
                'total'=> $product->total,
                'type'=> $product->type
                ]);
        }
    }

    public function saveJsonEmployees(Request $request)
    {
        $employees = json_decode($request->data);

        foreach ($employees as $employee)
        {
            $employee_db = new Employee();

            $employee_db->name = $employee->name;
            $employee_db->sex = $employee->sex;
            $employee_db->birth_date = $employee->birth_date;
            $employee_db->address = $employee->address;
            $employee_db->phone_no = $employee->phone_no;
            $employee_db->coefficient_salary = $employee->coefficient_salary;
            $employee_db->position = $employee->position;

            $employee_db->save();
            
        }
    }

    public function updateJsonEmployees(Request $request)
    {
        $employees = json_decode($request->data);
    
        foreach ($employees as $employee)
        {
            $employee_db = Employee::where('id', $employee->id);

            $employee_db->update([
                'name'=>$employee->name,
                'sex'=>$employee->sex,
                'birth_date'=>$employee->birth_date,
                'address'=>$employee->address,
                'phone_no'=>$employee->phone_no,
                'coefficient_salary'=>$employee->coefficient_salary,
                'position'=>$employee->position
            ]);
            
        }
    }

    public function saveJsonExportReceipt(Request $request)
    {
        $export_receipt = json_decode($request->data);
        $export_receipt_db = new ExportReceipt();

        $export_receipt_db->date = $export_receipt->date;
        $export_receipt_db->id_employee = $export_receipt->employee->id;
        $export_receipt_db->save();

        foreach ($export_receipt->item as $product)
        {
            DB::table('receipt_item')->insert([
                'id_receipt'=>$export_receipt_db->id,
                'id_product'=>$product->id,
                'amount'=>$product->total,
                'price'=>$product->price,
            ]);
        }


    }

    public function updateJsonExportReceipt(Request $request)
    {

    }

    public function saveJsonImportReceipt(Request $request)
    {
        $import_receipt = json_decode($request->data);
        $import_receipt_db = new ImportReceipt();
        
        $import_receipt_db->id_manager = $import_receipt->importer->id;
        $import_receipt_db->id_supplier = $import_receipt->supplier->id;
        $import_receipt_db->date = $import_receipt->date;

        $import_receipt_db->save();

        foreach ($import_receipt->items as $product)
        {
            $product_db = new Product();

            $product_db->name = $product->name;
            $product_db->price = $product->price;
            $product_db->total = $product->total;
            $product_db->type = $product->type;
            $product_db->save();

            DB::table('import_receipt')->insert([
                'id_receipt'=>$import_receipt_db->id,
                'id_product'=>$product_db->id,
                'amount'=>$product_db->total,
                'price'=>$product_db->price,
            ]);
        }
    }

    public function updateJsonImportReceipt(Request $request)
    {
        
    }

    public function loginApp(Request $request)
    {
        $account = json_decode($request->data);
        $account_db = DB::table('account')->where('user_name',$account->username)
        ->where('password',$account->password)->first();
        if ($account_db != null){
            $employee_db = Employee::where('id',$account_db->id_employee)->first();
            echo json_encode($employee_db);
        }
    }

    public function saveJsonAccount(Request $request)
    {
        $account = json_decode($request->data);

        DB::table('account')->insert([
            []
        ]);

    }

    public function updateJsonAccount(Request $request)
    {

    }
    
    public function getJsonSuppliers()
    {
        $supplier = DB::table('supplier')->get();
        return json_encode($supplier);
    }

    public function saveJsonSupplier(Request $request)
    {
        $supplier = json_decode($request->data);
        DB::table('supplier')->insert([
            [
                'name'=>$supplier->name,
                'address'=>$supplier->address,
                'mail'=>$supplier->mail,
                'phone_no'=>$supplier->phone_no,
            ]
        ]);
    }

    public function saveJsonManager(Request $request)
    {
        $manager = json_decode($request->data);
        $employee_db = new Employee();

        $employee_db->name = $manager->name ;
        $employee_db->sex = $manager->sex ;
        $employee_db->birth_date = $manager->birth_date ;
        $employee_db->address = $manager->address ;
        $employee_db->phone_no = $manager->phone_no ;
        $employee_db->coefficient_salary = $manager->coefficient_salary ;
        $employee_db->position = $manager->position ;
        $employee_db->save();

        $manager_db = DB::table('employee_manager')->insert([
            [
                'id_manager'=>$employee_db->id,
                'commission'=>$manager->commission,
            ]
        ]);

    }

    public function updateJsonManager(Request $request)
    {
        $manager = json_decode($request->data);
        $employee_db = Employee::where('id', $manager->id_manager);

        $employee_db->update([
            'name'=>$manager->name,
            'sex'=>$manager->sex,
            'birth_date'=>$manager->birth_date,
            'address'=>$manager->address,
            'phone_no'=>$manager->phone_no,
            'coefficient_salary'=>$manager->coefficient_salary,
            'position'=>$manager->position,
        ]);

        $manager_db = table('employee_manager')->where('id', $manager->id_manager);
        $manager_db->update([
            'commission'=>$manager->commission,
        ]);
    }

    public function getJsonManagers()
    {
        $manager_db = DB::table('employee_manager')->get();
        $managers = array();
        foreach($manager_db as $manager)
        {
            $employee_db = Employee::where('id', $manager->id_manager)->first();
            $employee_db['commission'] = $manager->commission;

            $managers[] = $employee_db;
        }
        return json_encode($managers);
    }
}