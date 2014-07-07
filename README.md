#MetaHelper

This is a library which helps web developers to better manage Open Graph, Twitter Cards and HTML Meta Data enabling them to implement Search Engine Optimization easier.

##Installation
Add the package to your `composer.json` and run `composer update` in your shell.

    {
        require: {
            "jwebkid/metahelper": "dev-master"
        }
    }
    
If you use Laravel you may also add an alias in your `app/config/app.php` file:

    'aliases' => array(
        'App'             => 'Illuminate\Support\Facades\App',
        'Artisan'         => 'Illuminate\Support\Facades\Artisan',
        'Auth'            => 'Illuminate\Support\Facades\Auth',
        'Blade'           => 'Illuminate\Support\Facades\Blade',
        ...
        'MetaHelper'       => 'JWebKid\MetaHelper'
    ),

##Quick Start
###Example 1
    <html lang="en">
    <head>
        <?php
            $meta = new MetaHelper();
            $meta->title("MetaHelper Rocks")
                ->description("A small description...")
                ->charset("UTF-8)
                ->view();
        ?>
    ...

##Meta Data
---------
`MetaHelper` library cater for the following meta tags:

|Meta Tag     | Default Value      | HTML Displayed                                   | Syntax
|-------------|--------------------|--------------------------------------------------|-----------------------------
| Title       | null               | `<title></title>`                                | `$helper->title("")`
| Description | null               | `<meta name="description" content="" />`         | `$helper->description("")`
| charset     | UTF-8              | `<meta charset=""/>`                             | `$helper->charset("")`
| Next        | null               | `<link rel="next" href="" />`                    | `$helper->next("")`
| Prev        | null               | `<link rel="prev" href="" />`                    | `$helper->prev("")`
| Canonical   | null               | `<link rel="canonical" href="" />`               | `$helper->canonical("")`

##Open Graph
As mentioned, you can easily use `MetaHelper` to display [Open Graph](http://ogp.me/) information about your web page.

    <?php
        $ogConfig = array(
            'title' => 'MetaHelper Rocks',
            'type' => 'website',
            'image' => array(
                'url' => 'http://example.com/logo.png',
                'secure_url' => 'https://example.com/logo.png',
                'type' => 'image/jpeg',
                'width' => '300',
                'height' => '500'
            )
        );
        $metaHelper->og($ogConfig)->view();

This would display the following meta tags:
    `<meta charset="UTF-8"><meta property="og:title" content="MetaHelper Rocks">`
    
    `<meta property="og:type" content="website">`
    
    `<meta property="og:image:url" content="http://example.com/logo.png">`
    
    `<meta property="og:image:secure_url" content="https://example.com/logo.png">`
    
    `<meta property="og:image:type" content="image/jpeg">`
    
    `<meta property="og:image:width" content="300">`
    
    `<meta property="og:image:height" content="500">`

##Twitter Cards
Finally `MetaHelper` can also take care of [Twitter Cards](https://dev.twitter.com/docs/cards). `MetaHelper` caters for all the different cards which Twitter Cards provide (Summery Card, Summery Image Card, Photo Card, Gallery Card, App Card, Product Card, Player Card).

###Summery Cards Example
    //To Create a Summery Card
    $metaHelper = new MetaHelper();
    
    $metaHelper->card('SummerCard', [
            'title' => 'This is a title',
            'description' => 'This is a description',
            'image' => 'http://example.com/logo.png',
        ]
    );
    
    //You can also change individual attributes
    $metaHelper->setCard()->title("A New Title");

All attribute names of all the Twitter Cards available follow the below convention:
| Twitter Card Attribute Style     | MetaHelper Style        |
|----------------------------------|-------------------------|
| twitter:app                      | $helper->app()          |
| twitter:app:id:googleplay        | $helper->appIdGoogleplay|

The only exception is the Summery Card with Large Image where for its `twitter:image:src` the normal `image` attribuet is used.

| Twitter Card                   | MetaHelper Keyword  |
|--------------------------------|---------------------|
| Summery Card                   | `SummeryCard`
| Summery With Large Image Card  | `SummeryImageCard`
| Gallery Card                   | `GalleryCard`
| Photo Card                     | `PhotoCard`
| Player Card                    | `PlayerCard`
| App Card                       | `AppCard`
| Product Card                   | `ProductCard`

It is important to keep in mind that all of these meta data can be used together like so:

    <?php
        $metaHelper = new MetaHelper();
        
        $metaHelper->title("Title")
            ->description("A description")
            ->card("SummeryCard", ["title"])
            ->og(["Title" => "title])
            ->view();
