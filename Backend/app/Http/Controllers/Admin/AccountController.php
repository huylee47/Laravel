<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Accounts;
use App\Services\admin\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    // Lấy danh sách tài khoản
    public function indexAccount()
    {
        $accounts = $this->accountService->getAllAccount();
        return response()->json($accounts);  // Trả về JSON
    }

    // Tạo tài khoản mới
    public function createAccount(AccountRequest $request)
    {
        $this->accountService->createAccount($request);
        return response()->json([
            'message' => 'Tài khoản đã được tạo thành công!'
        ], 201);  // Trả về JSON với mã 201 (Created)
    }

    // Thêm tài khoản mới từ request thông thường (trường hợp cần thiết)
    public function store(Request $request)
    {
        $account = new Accounts([
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
        ]);
        $account->save();

        return response()->json([
            'message' => 'Tài khoản đã được lưu thành công!',
            'account' => $account
        ], 201);  // Trả về JSON với mã 201
    }

    // Hiển thị form chỉnh sửa tài khoản (Nếu không cần, có thể bỏ)
    public function getProductId($id)
    {
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json(['error' => 'Tài khoản không tồn tại'], 404);
        }

        return response()->json($account);  // Trả về JSON
    }

    // Cập nhật tài khoản
    public function updateAccount($id, AccountRequest $request)
    {
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json(['error' => 'Tài khoản không tồn tại'], 404);
        }

        $this->accountService->updateAccount($id, $request);

        return response()->json([
            'message' => 'Tài khoản đã được cập nhật thành công!'
        ]);
    }

    // Xóa tài khoản
    public function deleteAccount($id)
    {
        $account = $this->accountService->getAccountId($id);

        if (!$account) {
            return response()->json(['error' => 'Tài khoản không tồn tại'], 404);
        }

        $this->accountService->deleteAccount($id);

        return response()->json([
            'message' => 'Tài khoản đã được xóa thành công!'
        ]);
    }
}
