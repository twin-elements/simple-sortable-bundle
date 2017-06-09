Sortable bundle
=======================

Symfony 3 Sortable bundle for CMS JELLINEK

1. Download this bundle to your project first. The preferred way to do it is
    to use [Composer](https://getcomposer.org/) package manager:
    
    ``` json
    $ composer require twin-elements/sortable-bundle
    ```
    
    > **NOTE:** If you haven't installed `Composer` yet, check the [installation guide][2].

    > **NOTE:** If you're not using `Composer`, add the `SortableBundle` to your autoloader manually. 

2. Add this bundle to your application's kernel:
    
    ``` php
    // app/AppKernel.php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new TwinElements\SortableBundle\TwinElementsSortableBundle(),
            // ...
        );
    }
    ```

3. Add to routing.yml:
    
    ``` yaml
    # app/config/routing.yml
    twin_elements_sortable:
            resource: "@TwinElementsSortableBundle/Controller/"
            type:     annotation
            prefix:   /
    ```
    
Usage
=====
    
...   