<?php
	// app/Models/Customer.php
	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Customer extends Model
	{
		public function employee()
		{
			return $this->belongsTo(Employee::class);
		}

		public function orders()
		{
			return $this->hasMany(Order::class);
		}
	}

	// app/Models/Employee.php
	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Employee extends Model
	{
		public function customers()
		{
			return $this->hasMany(Customer::class);
		}
	}

	// app/Models/Order.php
	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class Order extends Model
	{
		public function customer()
		{
			return $this->belongsTo(Customer::class);
		}
	}
?>