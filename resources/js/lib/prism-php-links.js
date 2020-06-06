/**
 * Original by Aaron Harun: http://aahacreative.com/2012/07/31/php-syntax-highlighting-prism/
 * Modified by Miles Johnson: http://milesj.me
 * Hacked by Jim Greenleaf to make markdown links take precedence
 *
 * Supports the following:
 *      - Extends clike syntax
 *      - Support for PHP 5.3+ (namespaces, traits, generators, etc)
 *      - Smarter constant and function matching
 *
 * Adds the following new token classes:
 *      constant, delimiter, variable, function, package
 */

var markdownlink = /\[([^\]]+)]\(([^)]+)\)/i;

Prism.languages.phplinks = Prism.languages.extend('php', {});

Prism.languages.insertBefore('phplinks', 'boolean', {
    'markdownlink': {
        pattern: markdownlink
    }
});

Prism.hooks.add('wrap', function(env) {
    if (env.type === 'markdownlink') {
        env.tag = 'a';
        
        var href = env.content;
        var match = env.content.match(markdownlink);
            
        href = match[2];
        env.content = match[1];

        env.attributes.href = href;
        env.attributes.target = '_blank';
    }
});