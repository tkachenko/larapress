<?='<?xml version="1.0" encoding="UTF-8"?>';?>
<sitemapindex xmlns="http://www.google.com/schemas/sitemap/0.84">
    @foreach($items AS $item)
        <sitemap>
            <loc>{{$item['url']}}</loc>
        </sitemap>
    @endforeach
</sitemapindex>