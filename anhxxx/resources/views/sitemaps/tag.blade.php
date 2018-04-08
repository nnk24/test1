<urlset
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- www.check-domains.com sitemap generator -->
    @if(isset($tags))
        @for($i = 0;$i<count($tags['name']); $i++)
            <url>
                <loc>{{route('tag', ['id'=>$tags['name_seo'][$i]])}}</loc>
                <lastmod>2018-04-09T12:00:00+00:00</lastmod>
            </url>
            <url>
                <loc>{{route('tagPost', ['id'=>$tags['name_seo'][$i]])}}</loc>
                <lastmod>2018-04-09T12:00:00+00:00</lastmod>
            </url>
            <url>
                <loc>{{route('tagImage', ['id'=>$tags['name_seo'][$i]])}}</loc>
                <lastmod>2018-04-09T12:00:00+00:00</lastmod>
            </url>
        @endfor
    @endif
</urlset>