<?
function prepare_for_rss($text) {
    $text= html_entity_decode($text); #NOTE: UTF-8 does not work!
    $text =  str_replace('&nbsp;', '', $text);
    $text =  str_replace('&', '', $text);

    return $text;
}



echo '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0">'; ?>
<channel>
    <title>{{$blogname}}</title>
    <link>{{$siteurl}}</link>
    <language>en-US</language>
    <docs>http://blogs.law.harvard.edu/tech/rss</docs>

    @foreach($articles AS $article)
        <item>
            <title>{!! prepare_for_rss($article->post_name) !!}</title>
            <description>{!!  prepare_for_rss($article->post_intro) !!}</description>
            <link>{{route('post', ['post_name' => $article->post_name])}}</link>
            <pubDate>{{date("D, d Y H:i:s", strtotime($article->post_date))}} GMT</pubDate>
            <guid>{{route('post', ['post_name' => $article->post_name])}}</guid>
        </item>
    @endforeach

</channel>
</rss>