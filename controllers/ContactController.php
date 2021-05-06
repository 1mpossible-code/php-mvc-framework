<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

/**
 * Class ContactController
 * @package app\controllers
 */
class ContactController extends Controller
{
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
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     * @return string
     */
    public function store(Request $request, Response $response): string
    {
        // Create an instance of contact form
        $contactForm = new ContactForm();
        // Load data to model
        $contactForm->loadData($request->getBody());
        // If sending is successful make success flash
        // message and redirect ot this page
        if ($contactForm->validate() && $contactForm->save()) {
            // Success flash message
            Application::$app->session->setFlash('success', 'Thanks for contacting us!');
            // Redirect back
            $response->redirect('/contact');
        }
        // Render contact page with model data
        return $this->render('contact', ['model' => $contactForm]);
    }

}