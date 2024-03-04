<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/acceuil' => [[['_route' => 'app_acceuil', '_controller' => 'App\\Controller\\AcceuilController::index'], null, null, null, false, false, null]],
        '/back' => [[['_route' => 'app_back', '_controller' => 'App\\Controller\\BackController::index'], null, null, null, false, false, null]],
        '/cour' => [[['_route' => 'app_cour_index', '_controller' => 'App\\Controller\\CourController::index'], null, ['GET' => 0], null, true, false, null]],
        '/cour/search' => [[['_route' => 'app_cour_search', '_controller' => 'App\\Controller\\CourController::search'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cour/cb' => [[['_route' => 'app_cour_index_back', '_controller' => 'App\\Controller\\CourController::indexBack'], null, ['GET' => 0], null, false, false, null]],
        '/cour/filtre' => [[['_route' => 'app_cour_filtre', '_controller' => 'App\\Controller\\CourController::filtre'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cour/filtreCateg' => [[['_route' => 'app_cour_filtre_categ', '_controller' => 'App\\Controller\\CourController::filtreC'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cour/new' => [[['_route' => 'app_cour_new', '_controller' => 'App\\Controller\\CourController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/front' => [[['_route' => 'app_front', '_controller' => 'App\\Controller\\FrontController::index'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/back/login' => [[['_route' => 'app_login_back', '_controller' => 'App\\Controller\\LoginBackController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\LoginController::logout'], null, null, null, false, false, null]],
        '/quiz/Epreuve/fail' => [[['_route' => 'app_quiz_fail', '_controller' => 'App\\Controller\\QuizController::fail'], null, ['GET' => 0], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/cour/(?'
                    .'|pdf/([^/]++)(*:28)'
                    .'|([^/]++)(?'
                        .'|(*:46)'
                        .'|/edit(*:58)'
                        .'|(*:65)'
                    .')'
                .')'
                .'|/qu(?'
                    .'|estion/(?'
                        .'|questions/([^/]++)(*:108)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|new(*:134)'
                                .'|edit(*:146)'
                            .')'
                            .'|(*:155)'
                        .')'
                    .')'
                    .'|iz/(?'
                        .'|quizes(?'
                            .'|/([^/]++)(*:189)'
                            .'|Front/([^/]++)(*:211)'
                        .')'
                        .'|new/([^/]++)(*:232)'
                        .'|Epreuve/Succes/([^/]++)(*:263)'
                        .'|([^/]++)(?'
                            .'|(*:282)'
                            .'|/(?'
                                .'|takequiz(*:302)'
                                .'|edit(*:314)'
                            .')'
                        .')'
                        .'|Epreuve/pdf/([^/]++)(*:344)'
                        .'|([^/]++)(*:360)'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:401)'
                    .'|wdt/([^/]++)(*:421)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:467)'
                            .'|router(*:481)'
                            .'|exception(?'
                                .'|(*:501)'
                                .'|\\.css(*:514)'
                            .')'
                        .')'
                        .'|(*:524)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [[['_route' => 'pdf_show', '_controller' => 'App\\Controller\\CourController::PdfShow'], ['id'], ['GET' => 0], null, false, true, null]],
        46 => [[['_route' => 'app_cour_show', '_controller' => 'App\\Controller\\CourController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        58 => [[['_route' => 'app_cour_edit', '_controller' => 'App\\Controller\\CourController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        65 => [[['_route' => 'app_cour_delete', '_controller' => 'App\\Controller\\CourController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        108 => [[['_route' => 'app_question_index', '_controller' => 'App\\Controller\\QuestionController::index'], ['id'], ['GET' => 0], null, false, true, null]],
        134 => [[['_route' => 'app_question_new', '_controller' => 'App\\Controller\\QuestionController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        146 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        155 => [
            [['_route' => 'app_question_show', '_controller' => 'App\\Controller\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, true, null],
        ],
        189 => [[['_route' => 'app_quiz_index', '_controller' => 'App\\Controller\\QuizController::index'], ['id'], ['GET' => 0], null, false, true, null]],
        211 => [[['_route' => 'app_quiz_index_front', '_controller' => 'App\\Controller\\QuizController::indexFront'], ['id'], ['GET' => 0], null, false, true, null]],
        232 => [[['_route' => 'app_quiz_new', '_controller' => 'App\\Controller\\QuizController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        263 => [[['_route' => 'app_quiz_succes', '_controller' => 'App\\Controller\\QuizController::Succes'], ['id'], ['GET' => 0], null, false, true, null]],
        282 => [[['_route' => 'app_quiz_show', '_controller' => 'App\\Controller\\QuizController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        302 => [[['_route' => 'app_quiz_display', '_controller' => 'App\\Controller\\QuizController::DisplayFront'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        314 => [[['_route' => 'app_quiz_edit', '_controller' => 'App\\Controller\\QuizController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        344 => [[['_route' => 'app_pdf_epreuve', '_controller' => 'App\\Controller\\QuizController::pdfEpreuve'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        360 => [[['_route' => 'app_quiz_delete', '_controller' => 'App\\Controller\\QuizController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        401 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        421 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        467 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        481 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        501 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        514 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        524 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
