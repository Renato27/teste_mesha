<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EletronicPointRequest;
use App\Http\Requests\EletronicPointSearchRequest;
use App\Http\Resources\EletronicPointResource;
use App\Models\EletronicPoint;
use App\Services\ELetronicPoint\CreateELetronicPoint\Contracts\CreateELetronicPointService;
use App\Services\ELetronicPoint\ValidationELetronicPoint\Contracts\ValidationELetronicPointService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EletronicPointController extends Controller
{
    /**
     * Retorna uma lista de registros de ponto eletrônico.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EletronicPointSearchRequest $request)
    {
        $eletronicPoints = EletronicPoint::where($request->getSearchCallback())
        ->orderBy('name')
        ->paginate(5);

        return EletronicPointResource::collection($eletronicPoints);
    }

    /**
     * Faz o cadastro de um registro de ponto eletrônico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EletronicPointRequest $request)
    {
        $service = app(CreateELetronicPointService::class);
        try {
            $eletronicPoint = $service->setData($request->all())->handle();

            return new EletronicPointResource($eletronicPoint);
        } catch (\Throwable $th) {
            throw new HttpException(400, $th->getMessage());
        }
    }

    /**
     * Mostra a penas um registro de ponto eletrônico.
     *
     * @param  \App\Models\EletronicPoint  $eletronicPoint
     * @return \Illuminate\Http\Response
     */
    public function show(EletronicPoint $eletronicPoint)
    {
        return new EletronicPointResource($eletronicPoint);
    }

    /**
     * Faz a validação de um registro de ponto eletrônico.
     *
     * @param EletronicPoint $eletronicPoint
     * @return void
     */
    public function validation(EletronicPoint $eletronicPoint)
    {
        $service = app(ValidationELetronicPointService::class);
        try {
            $eletronicPointValidated = $service->setELetronicPoint($eletronicPoint)->handle();

            return new EletronicPointResource($eletronicPointValidated);
        } catch (\Throwable $th) {
            throw new HttpException(400, $th->getMessage());
        }
    }
}
