<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach($products as $pro)
        <url>
            <loc>
            {{ urldecode(url('/'.@$pro->url)) }}
            </loc>
            <changefreq>{{$setting_header->sitemaptime}}</changefreq>
            <priority>{{$setting_header->priority}}</priority>
        </url>
    @endforeach

    @foreach($articles as $art)
        <url>
            <loc>
            {{ urldecode(url('/'.@$art->url)) }}
            </loc>
            <changefreq>{{$setting_header->sitemaptime}}</changefreq>
            <priority>{{$setting_header->priority}}</priority>
        </url>
    @endforeach

    @foreach($catart as $cata)
        <url>
            <loc>
            {{ urldecode(url('/'.@$cata->url)) }}
            </loc>
            <changefreq>{{$setting_header->sitemaptime}}</changefreq>
            <priority>{{$setting_header->priority}}</priority>
        </url>
    @endforeach

    @foreach($category as $cat)
        <url>
            <loc>
            {{ urldecode(url('/'.@$cat->url)) }}
            </loc>
            <changefreq>{{$setting_header->sitemaptime}}</changefreq>
            <priority>{{$setting_header->priority}}</priority>
        </url>
    @endforeach
</urlset>
