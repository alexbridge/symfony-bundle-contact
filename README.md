ContactBundle
=============

Bundle for Symfony 2 with a generic contact form for your website.

Fields:

- Name
- Email
- Subject
- Message

Installation:

- `composer require alexbridge/symfony-bundle-contact`
- Enable Bundle
  
          // app/AppKernel.php
          public function registerBundles()
          {
              $bundles = array(
                  // ...
                  new Alexo\ContactBundle\ContactBundle(),
              );
          }
- Register routes

        // app/config/routing.yml
        contact:
            resource: "@ContactBundle/Controller/"
            type:     annotation
            prefix:   /contact


Configuration:

    contact:
        # an array email addresses to receive contact messages
        receiver_emails: []
        
Routes:

- add `contact` route to your views and route generation
- access `/contact` uri to see contact form