<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Room;
use App\Models\User;
use App\Models\Ward;
use App\Models\Nurse;
use App\Models\Vital;
use App\Models\Advice;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Allergy;
use App\Models\BedType;
use App\Models\Billing;
use App\Models\LabTest;
use App\Models\Patient;
use App\Models\Diagnose;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Purchase;
use App\Models\RoomType;
use App\Models\Schedule;
use App\Models\Supplier;
use App\Models\TestType;
use App\Models\BloodBank;
use App\Models\operation;
use App\Models\BloodDonor;
use App\Models\BloodStock;
use App\Models\Department;
use App\Models\Laboratory;
use App\Models\Specialist;
use App\Models\DoctorOrder;
use App\Models\BloodRequest;
use App\Models\ChequeDetail;
use App\Models\Immunization;
use App\Models\PatientVisit;
use App\Models\Prescription;
use App\Models\Investigation;
use App\Models\OperationType;
use App\Models\PatientRecord;
use App\Models\BillingInvoice;
use App\Models\PharmacyInvoice;
use Illuminate\Database\Seeder;
use App\Models\BloodStockDetail;
use App\Models\MedicineCategory;
use App\Models\SampleCollection;
use App\Models\BillingTransaction;
use App\Models\MedicalCertificate;
use App\Models\PresentingComplain;
use Spatie\Permission\Models\Role;
use App\Models\BillingInvoiceDetail;

class TablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(20)->create();
        foreach (Role::all() as $role) {
            $users = User::factory()->count(20)->create();
            foreach ($users as $user) {
                $user->assignRole($role);
            }
        }

        // $user->assignRole($this->faker->randomElement(['admin','doctor','nurse','staff','pharmacies','accountant','sales-person','patient','super-admin']));
        // Advice::factory()->count(40)->create();
        // Allergy::factory()->count(40)->create();
        // Bed::factory()->count(40)->create();
        // BedType::factory()->count(40)->create();
        // Billing::factory()->count(40)->create();
        // BillingInvoice::factory()->count(40)->create();
        // BillingInvoiceDetail::factory()->count(40)->create();
        // BillingTransaction::factory()->count(40)->create();
        // BloodBank::factory()->count(40)->create();
        // BloodDonor::factory()->count(40)->create();
        // BloodRequest::factory()->count(40)->create();
        // BloodStock::factory()->count(40)->create();
        // BloodStockDetail::factory()->count(40)->create();
        // Branch::factory()->count(40)->create();
        // ChequeDetail::factory()->count(40)->create();
        Department::factory()->count(20)->create();
        // Diagnose::factory()->count(40)->create();
        // DoctorOrder::factory()->count(40)->create();
        // Immunization::factory()->count(40)->create();
        // Investigation::factory()->count(40)->create();
        // Laboratory::factory()->count(40)->create();
        // LabTest::factory()->count(40)->create();
        // MedicalCertificate::factory()->count(40)->create();
        // MedicineCategory::factory()->count(40)->create();
        // Medicine::factory()->count(40)->create();
        Specialist::factory()->count(20)->create();
        Nurse::factory()->count(20)->create();
        Doctor::factory()->count(20)->create();
        // Operation::factory()->count(40)->create();
        // OperationType::factory()->count(40)->create();
        // PatientRecord::factory()->count(40)->create();
        Patient::factory()->count(20)->create();
        // PatientVisit::factory()->count(40)->create();
        // PharmacyInvoice::factory()->count(40)->create();
        // Pharmacy::factory()->count(20)->create();
        // Prescription::factory()->count(40)->create();
        // PresentingComplain::factory()->count(40)->create();
        // Purchase::factory()->count(40)->create();
        // Room::factory()->count(40)->create();
        // RoomType::factory()->count(40)->create();
        // SampleCollection::factory()->count(40)->create();
        // Schedule::factory()->count(40)->create();
        Supplier::factory()->count(20)->create();
        // TestType::factory()->count(40)->create();
        // Vital::factory()->count(40)->create();
        // Ward::factory()->count(40)->create();
    }
}
