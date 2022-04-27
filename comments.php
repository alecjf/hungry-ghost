<?php
//Get only the approved comments
$args = [
    'status' => 'approve',
];

// The comment Query
$comments_query = new WP_Comment_Query(['post_id' => get_the_ID()]);
$comments = $comments_query->query($args);

function format_local_date($timestamp)
{
    $dt = new DateTimeImmutable($timestamp, new DateTimeZone('UTC'));
    // Format $dt in local server timezone
    $result = $dt
        ->setTimezone((new DateTime())->getTimezone())
        ->format('n-j-Y g:i a');
    return $result;
}

// Comment Loop
if ($comments) {
    foreach ($comments as $comment) {
        echo '<p class="single-comment"><small><em><u>' .
            $comment->comment_author .
            ' at ' .
            format_local_date($comment->comment_date) .
            '</u></em></small><br />' .
            $comment->comment_content .
            '</p>';
    }
} else {
    echo 'No comments found.';
}
