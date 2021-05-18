<?php


namespace app\controllers;


use app\services\ContactService;
use impossible\phpmvc\Application;
use impossible\phpmvc\Controller;
use impossible\phpmvc\Request;
use impossible\phpmvc\Response;
use app\models\ContactForm;

/**
 * Class ContactController
 * @package app\controllers
 */
class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private ContactService $contactService;

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        // Contact service
        $this->contactService = new ContactService();
    }

    /**
     * Show contact page
     * @return array|false|string|string[]
     */
    public function index()
    {
        // Create an instance of contact form
        $contactForm = new ContactForm();
        // Render contact page with contact form model
        return $this->render('contact', ['model' => $contactForm]);
    }

    /**
     * Handle the data from
     * contact's page request
     * @param Request $request
     * @param Response $response
     * @return string
     */
    public function store(Request $request, Response $response): string
    {
        // Create an instance of contact form
        $contactForm = new ContactForm();
        // If saving is successful make success flash
        // message and redirect ot this page
        if ($this->contactService->save($contactForm, $request)) {
            // Success flash message
            Application::$app->session->setFlash('success', 'Thanks for contacting us!');
            // Redirect back
            $response->redirect('/contact');
        }
        // Render contact page with model data
        return $this->render('contact', ['model' => $contactForm]);
    }

}