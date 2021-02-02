<?php

namespace App\Http\Controllers;

use App\Clients\GitClient;
use Illuminate\Http\Request;
use App\Handlers\RequestHandler;
use App\Handlers\ResponseHandler;

class GitController extends Controller
{
    protected $_request;
    protected $_response;

    public function __construct(Request $request, RequestHandler $_request, ResponseHandler $_response) {
        $this->_request = $_request->filter($request);
        $this->_response = $_response;
    }

    public function index(GitClient $client) {
        if(!$this->_request)
            return $this->_response->badRequest('Validation Failed');

        $repos = $client->getRepos($this->_request);
//        dd($repos);
        $this->_response->addParameter($repos);
        return $this->_response->OK();


    }

}
