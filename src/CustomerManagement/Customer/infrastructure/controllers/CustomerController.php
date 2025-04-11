<?php

namespace Src\CustomerManagement\Customer\infrastructure\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Src\CustomerManagement\Customer\Application\CreateCustomerUseCase;
use Src\CustomerManagement\Customer\Application\ListCustomersUseCase;
use Src\CustomerManagement\Customer\Application\UpdateCustomerUseCase;
use Src\CustomerManagement\Customer\Application\DeleteCustomerUseCase;
use Src\CustomerManagement\Customer\Infrastructure\Validators\CreateCustomerValidator;
use Src\CustomerManagement\Customer\Infrastructure\Validators\UpdateCustomerValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

final class CustomerController extends Controller 
{
    public function store(Request $request, CreateCustomerUseCase $useCase)
{
    try {
        (new CreateCustomerValidator())->validate($request->all());

        $customer = $useCase($request->name, $request->email);

        return response()->json($customer->toArray(), 201);
    } catch (HttpResponseException $e) {
        throw $e; // ← deja que Laravel maneje esto normalmente (ya tiene respuesta JSON)
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }
}

    public function index(Request $request, ListCustomersUseCase $useCase)
    {
        try {
            $customers = $useCase($request->query('name'), $request->query('sort', 'desc'));
            return response()->json($customers);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id, UpdateCustomerUseCase $useCase)
    {
        try {
            (new UpdateCustomerValidator())->validate($request->all());

            $customer = $useCase((int)$id, $request->name, $request->email);
            if (!$customer) {
                return response()->json(['message' => 'Cliente no encontrado'], 404);
            }
            return response()->json($customer);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id, DeleteCustomerUseCase $useCase)
    {
        try {
            $deleted = $useCase((int)$id);
            if (!$deleted) {
                return response()->json(['message' => 'Cliente no encontrado'], 404);
            }
            return response()->json(['message' => 'Cliente eliminado correctamente']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}