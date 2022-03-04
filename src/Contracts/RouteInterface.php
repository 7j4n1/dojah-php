<?php
	
	namespace DojahCore\Contracts;

	interface RouteInterface {
		const METHOD_KEY = 'method';
		const ENDPOINT_KEY = 'endpoint';
                const PARAMS_KEY = 'params';
                const ARGS_KEY = 'args';
                const REQUIRED_KEY = 'args';
                const POST_METHOD = 'post';
                const GET_METHOD = 'get';
                const PUT_METHOD = 'put';

                public static function root();

	}