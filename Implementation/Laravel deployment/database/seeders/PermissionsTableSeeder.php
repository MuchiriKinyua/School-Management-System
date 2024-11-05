<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

                    'casecategory-list',
                    'casecategory-create',
                    'casecategory-edit',
                    'casecategory-delete',
        
                    'casefile-list',
                    'casefile-create',
                    'casefile-edit',
                    'casefile-delete',
        
                    'casefolder-list',
                    'casefolder-create',
                    'casefolder-edit',
                    'casefolder-delete',
        
                    'document-list',
                    'document-create',
                    'document-edit',
                    'document-delete',
        
                    'documentpagecount-list',
                    'documentpagecount-create',
                    'documentpagecount-edit',
                    'documentpagecount-delete',
        
                    'documenttype-list',
                    'documenttype-create',
                    'documenttype-edit',
                    'documenttype-delete',
        
                    'field-list',
                    'field-create',
                    'field-edit',
                    'field-delete',
        
                    'fieldcategory-list',
                    'fieldcategory-create',
                    'fieldcategory-edit',
                    'fieldcategory-delete',
        
                    'fileretention-list',
                    'fileretention-create',
                    'fileretention-edit',
                    'fileretention-delete',
        
                    'fileretentiondate-list',
                    'fieldcategorydate-create',
                    'fileretentiondate-edit',
                    'fileretentiondate-delete',
        
                    'form-list',
                    'form-create',
                    'form-edit',
                    'form-delete',
        
                    'log-list',
                    'log-create',
                    'log-edit',
                    'log-delete',
        
                    'metadatadefinition-list',
                    'metadatadefinition-create',
                    'metadatadefinition-edit',
                    'metadatadefinition-delete',
        
        
                    'form-list',
                    'form-create',
                    'form-edit',
                    'form-delete',
        
                    'log-list',
                    'log-create',
                    'log-edit',
                    'log-delete',
        
        
            
                    'metadatavalue-list',
                    'metadatavalue-create',
                    'metadatavalue-edit',
                    'metadatavalue-delete',
        
        
                    'permission-list',
                    'permission-create',
                    'permission-edit',
                    'permission-delete',
        
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
        
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
        
                    'workflow-list',
                    'workflow-create',
                    'workflow-edit',
                    'workflow-delete',
        
                    'workflowrule-list',
                    'workflowrule-create',
                    'workflowrule-edit',
                    'workflowrule-delete',
        
                    'workflowstep-list',
                    'workflowstep-create',
                    'workflowstep-edit',
                    'workflowstep-delete',
        
                    'casefolder-list',
                    'casefolder-create',
                    'casefolder-edit',
                    'casefolder-delete',
        
                    'document-list',
                    'document-create',
                    'document-edit',
                    'document-delete',
        
                    'documentrequirement-list',
                    'documentrequirement-create',
                    'documentrequirement-edit',
                    'documentrequirement-delete',
        
                    'documentsignature-list',
                    'documentsignature-create',
                    'documentsignature-edit',
                    'documentsignature-delete',
        
                    'duplicatedocument-list',
                    'duplicatedocument-create',
                    'duplicatedocument-edit',
                    'duplicatedocument-delete',
        
                    'file-list',
                    'file-create',
                    'file-edit',
                    'file-delete',
        
                    'filestore-list',
                    'filestore-create',
                    'filestore-edit',
                    'filestore-delete',
        
                    'filestore-list',
                    'filestore-create',
                    'filestore-edit',
                    'filestore-delete',
        
                    'license-list',
                    'license-create',
                    'license-edit',
                    'license-delete',
        
                    'licensesession-list',
                    'licensesession-create',
                    'licensesession-edit',
                    'licensesession-delete',
        
                    'mfacode-list',
                    'mfacode-create',
                    'mfacode-edit',
                    'mfacode-delete',
        
                    'smsconfiguration-list',
                    'smsconfiguration-create',
                    'smsconfiguration-edit',
                    'smsconfiguration-delete',
        
                    'smtpconfiguration-list',
                    'smtpconfiguration-create',
                    'smtpconfiguration-edit',
                    'smtpconfiguration-delete',
        
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
        
                    'userkey-list',
                    'userkey-create',
                    'userkey-edit',
                    'userkey-delete',
        
                    'workflow-list',
                    'workflow-create',
                    'workflow-edit',
                    'workflow-delete',
        
                    'workflowdocument-list',
                    'workflowdocument-create',
                    'workflowdocument-edit',
                    'workflowdocument-delete',
        
                    'workflowinstance-list',
                    'workflowinstance-create',
                    'workflowinstance-edit',
                    'workflowinstance-delete',
        
                    'workflowstep-list',
                    'workflowstep-create',
                    'workflowstep-edit',
                    'workflowstep-delete',
        
                    'workflowstepaction-list',
                    'workflowstepaction-create',
                    'workflowstepaction-edit',
                    'workflowstepaction-delete',
        
                    'workflowstepcomment-list',
                    'workflowstepcomment-create',
                    'workflowstepcomment-edit',
                    'workflowstepcomment-delete',
        
                    'workflowsteprequirement-list',
                    'workflowsteprequirement-create',
                    'workflowsteprequirement-edit',
                    'workflowsteprequirement-delete',
        
        ];
            foreach ($data as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
