<?php
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'entreprise-list','entreprise-create','entreprise-edit','entreprise-delete',
            'agent-list','agent-create','agent-edit','agent-delete',
            'user-list','user-create','user-edit','user-delete',
            'fournisseur-list','fournisseur-create','fournisseur-edit','fournisseur-delete',
            'categorie-list','categorie-create','categorie-edit','categorie-delete',
            'article-list','article-create','article-edit','article-delete',
            'unite-list','unite-create','unite-edit','unite-delete',
            'role-list','role-create','role-edit','role-delete',
         ];
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
