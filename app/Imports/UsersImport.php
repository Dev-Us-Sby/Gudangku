<?php

namespace App\Imports;

use App\Entities\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use \Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UsersImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
//        dd($row);

        if (!empty($row)) {
            $username_check = User::where('username', $row["2"])->first();

            if ($username_check == true) {
                throw new BadRequestHttpException("Data already exists!");
            } else {
                return new User([
                    'name' => $row["1"],
                    'username' => $row["2"],
                    'password' => bcrypt($row["3"]),
                ]);
            }

        }

    }
}
