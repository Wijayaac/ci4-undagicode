<?php


namespace App\Controllers;

use \App\Models\ModelEmployee;

class Employee extends BaseController
{
    protected $modelEmployee;
    public function __construct()
    {
        $this->modelEmployee = new ModelEmployee();
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $data = [
            'employees' => $this->modelEmployee->paginate(4, 'bootstrap'),
            'pager'    => $this->modelEmployee->pager,
        ];
        return view('Employee/Home', $data);
    }

    public function search()
    {
        $value     = $this->request->getVar('searchItem');
        $employees = $this->modelEmployee->getSearch($value);
        return $this->response->setJSON($employees);
    }

    public function add()
    {
        return view('Employee/Add');
    }

    public function save()
    {
        $isValid = $this->validate([
            'employeeName'   => [
                'rules'  =>  'required',
                'errors' =>  [
                    'required' => 'Pleas fill this field'
                ],
            ],
            'employeeEmail' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'valid_email' => 'We cannot found your email, please change',
                    'required' => 'Pleas fill this field'
                ],
            ],
            'employeeCv' => [
                'rules' => 'mime_in[employeeCv,application/pdf,application/vnd-ms-word]',
                'errors' => [
                    'mime_in'  => 'Please input an Document (pdf/doc)',
                ]
            ],
        ]);

        $employeeId          = $this->request->getVar('id');
        $employeeName        = $this->request->getVar('employeeName');
        $employeeAddress     = $this->request->getVar('employeeAddress');
        $employeePhone       = $this->request->getVar('employeePhone');
        $employeeEmail       = $this->request->getVar('employeeEmail');
        $employeeGender      = $this->request->getVar('employeeGender');

        if ($isValid) {

            $documentFile =    $this->request->getFile('employeeCv');
            $documentName = $documentFile->getRandomName();
            $documentFile->move('uploads/document/', $documentName);

            $data = [
                'id'           => $employeeId,
                'employee_name' => $employeeName,
                'address'      => $employeeAddress,
                'phone'        => $employeePhone,
                'email'        => $employeeEmail,
                'gender'       => $employeeGender,
                'cv'           => $documentName,
            ];


            $this->modelEmployee->insert($data);
            if ($this->dbAffectedRows() == 1) {
                $response = [
                    'result'   => 1,
                    'message'   => "Employee has been added"
                ];
            } else {
                $response = [
                    'result'   => 2,
                    'message'   => "Employee has not been added"
                ];
            }
        } else {
            $response = [
                'result'   => 3,
                'message'   => [
                    'errorName'      => $this->validator->getError('employeeName'),
                    'errorEmail'     => $this->validator->getError('employeeEmail'),
                    'errorCV'        => $this->validator->getError('employeeCv'),
                ],
                'data'                  => [
                    'employee_name'  => $employeeName,
                    'email'         => $employeeEmail,
                ]
            ];
        }

        return $this->response->setJSON($response);
    }

    public function delete($id)
    {
        $dataEmployee = $this->modelEmployee->find($id);

        if ($this->modelEmployee->delete($id)) {
            unlink('uploads/document/' . $dataEmployee['CV']);
            return redirect()->to('/Employee');
        } else {
            echo "Error";
        }
        return redirect()->to('/Employee');
    }

    public function edit($id)
    {
        $data = [
            'employee' => $this->modelEmployee->find($id),
        ];

        return view('Employee/Edit', $data);
    }

    public function update()
    {

        $employeeId          = $this->request->getVar('id');
        $employeeName        = $this->request->getVar('employeeName');
        $employeeAddress     = $this->request->getVar('employeeA$employeeAddress');
        $employeePhone       = $this->request->getVar('employeePhone');
        $employeeEmail       = $this->request->getVar('employeeEmail');
        $employeeGender      = $this->request->getVar('employeeGender');


        $oldData        = $this->modelEmployee->find($employeeId);
        $oldImage       = $oldData['cv'];

        $isValid = $this->validate([
            'employeeName'   => [
                'rules'  =>  'required',
                'errors' =>  [
                    'required' => 'Please insert Employee name'
                ]
            ],
            'employeeEmail' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'valid_email' => 'We cannot found your email, please change',
                    'required' => 'Pleas fill this field'
                ],
            ],
            'employeeCv' => [
                'rules' => 'mime_in[employeeCv,application/pdf,application/vnd-ms-excel]',
                'errors' => [
                    'mime_in'  => 'Please input an Document (pdf/doc)',
                ]
            ],
        ]);

        if ($isValid) {


            $documentFile  = $this->request->getFile('employeeCv');

            if ($documentFile->getError() === 4) {
                $documentName = $oldImage;
            } else {
                $documentName = $documentFile->getRandomName();
                $documentFile->move('uploads/', $documentName);
            }


            $data = [
                'product_name'  => $employeeName,
                'price'         => $employeeAddress,
                'weight'        => $employeePhone,
                'category'      => $employeeEmail,
                'tag'           => $employeeGender,
                'image'         => $documentName,

            ];


            $this->modelEmployee->update($employeeId, $data);
            if ($this->dbAffectedRows() == 1) {
                $response = [
                    'result'   => 1,
                    'message'   => "Employee has been updated"
                ];
            } else {
                $response = [
                    'result'   => 2,
                    'message'   => "Employee has not been updated"
                ];
            }
        } else {
            $response = [
                'result'   => 3,
                'message'   => [
                    'errorName'         => $this->validator->getError('employeeName'),
                    'errorEmail'        => $this->validator->getError('employeeEmail'),
                    'errorCv'           => $this->validator->getError('employeeCv'),
                ],
                'data'                  => [
                    'product_name'  => $employeeName,
                    'price'         => $employeeEmail,
                ]
            ];
        }
        return $this->response->setJSON($response);
    }
    /*
        * print method for printing data from database
    */
    public function print()
    {


        $data = [
            'employees' => $this->modelEmployee->findAll(),
        ];

        return view('Employee/Print', $data);
    }

    public function export()
    {

        $data = [
            'employees' => $this->modelEmployee->findAll(),
        ];

        return view('Employee/Export', $data);
    }
}
