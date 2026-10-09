<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TFA4PasswordSeeder extends Seeder
{
    public function run()
    {
        $password = getenv('TFA4_INITIAL_PASSWORD');
        if (! is_string($password) || strlen($password) < 12) {
            throw new \RuntimeException('Set TFA4_INITIAL_PASSWORD to a unique password of at least 12 characters before seeding.');
        }
        $this->db->table('users')->update(['password' => password_hash($password, PASSWORD_DEFAULT)]);
    }
}
