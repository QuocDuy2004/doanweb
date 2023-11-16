<?php 

use App\Models\Customer;

$id= $_REQUEST['id'];
$customer = Customer::find($id);
if($customer == NULL){
    header("location:index.php?option=customer&cat=trash");
}

$customer->delete();
header("location:index.php?option=customer&cat=trash");