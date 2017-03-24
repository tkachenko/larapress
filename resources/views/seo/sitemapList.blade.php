<?='<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">
    @foreach($items AS $item)
        <url>
            <loc>{{$item['url']}}</loc>
            <lastmod>{{$item['lastmod']}}</lastmod>
            <priority>{{$item['priority']}}</priority>
        </url>
    @endforeach
</urlset>