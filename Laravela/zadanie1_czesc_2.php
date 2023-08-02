<?php
	use App\Models\Customer;

	$customerId = 1;

	$customer = Customer::with(['employee', 'orders'])
		->where('id', $customerId)
		->first();

	if ($customer) {
		// Pobranie danych klienta
		$customerData = $customer->toArray();

		// Pobranie danych przypisanego pracownika
		$employeeData = $customer->employee->toArray();

		// Pobranie ostatnich zamówień klienta
		$latestOrders = $customer->orders()
			->orderBy('created_at', 'desc')
			->take(5) // Można zmienić liczbę, aby pobrać inną ilość zamówień
			->get()
			->toArray();

		// Tutaj możemy przetwarzać i wyświetlać pobrane dane
		// np. return view('customer-details', compact('customerData', 'employeeData', 'latestOrders'));
	} else {
		// Obsłużenie przypadku, gdy klient o danym identyfikatorze nie istnieje
		// np. return view('customer-not-found');
	}
?>