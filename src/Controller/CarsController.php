<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Response;

/**
 * Cars Controller
 *
 * @property \App\Model\Table\CarsTable $Cars
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarsController extends AppController
{
    public function index()
    {
        $cars = $this->Cars->find('all');

        return $this->responseWithSuccess($cars);
    }

    /**
     * Esse fluxo é tratado pelo PersistenceOrmMiddleware
     * validate um exception caso tenha erros,
     * create outro exception caso tenha erros de persistencia
     * @return \Cake\Http\Response
     */
    public function add()
    {

        $company = $this->Cars->instanceAndValidate(
            $this->request->getData()
        );

        $this->Cars->createOrFail($company, true);

        return $this->responseWithSuccess($company);
    }

    public function show($id = null)
    {
        $car = $this->Cars->get($id);

        return $this->responseWithSuccess($car);
    }

    public function edit($id = null)
    {
        $car = $this->Cars->get($id);

        if ($this->request->is(['put'])) {

            $this->Cars->patchEntity($car, $this->request->getData());
            if ($this->Cars->save($car)) {
                return $this->responseWithSuccess($car);
            }

            return $this->responseWithErrors($car);
        }
    }

    public function delete($id = null)
    {
        $car = $this->Cars->get($id);

        if ($this->request->is(['delete'])) {

            if ($this->Cars->delete($car)) {
                return $this->responseOk();
            }

            return $this->responseWithErrors($car);
        }
    }

    public function transfer()
    {
        return $this->responseNotImplemented();
    }




}
