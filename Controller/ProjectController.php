<?php

namespace Controller;

use Http\Response;
use Repository\ProjectRepositoryInterface;

class ProjectController {

        protected $projectRepository = null;

        public function __construct(ProjectRepositoryInterface $projectRepository) {
            $this->projectRepository = $projectRepository;
        }

        public function list() {

            $content = $this->render("list", [
                'projects' => $this->projectRepository->findAll()
            ]);

            return new Response($content);
            
        }

        public function showProjectForm() {
            $content = $this->render("create-project");
            return new Response($content);;
        }

        public function create() {
            $this->projectRepository->add("New Project 1");
            return new Response('/', '301', 'Redirect');
        }

        public function show() {
            return new Response();
        }


        protected function render($templateName, $vars = []) {
            ob_start();
            extract($vars);
            include __DIR__ . DIRECTORY_SEPARATOR . "../templates/" . $templateName . ".php";           
            $content = ob_get_contents();
            ob_end_clean();

            return $content;
        }


}