<urlset
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- www.check-domains.com sitemap generator -->
    @if(isset($types))
        @foreach($types as $type)
            <url>
                <loc>{{route('type', ['id'=>$type->name_seo])}}</loc>
                <lastmod>{{isset($type->created_at)?$type->created_at->toAtomString():'2018-04-09T12:00:00+00:00'}}</lastmod>
            </url>
        @endforeach
    @endif
</urlset>