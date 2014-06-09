(function(){

if (!self.Prism) { return; }

linkMd = /\[([^\]]+)]\(([^)]+)\)/;
skipTypes = ['inside', 'pattern', 'md-link'];
    
for (var language in Prism.languages) {
    var tokens = Prism.languages[language];
    
    Prism.languages.DFS(tokens, function (type, def) {

        if (skipTypes.indexOf(type) === -1) {
            if (!def.pattern) {
                def = this[type] = {
                    pattern: def
                };
            }
            
            def.inside = def.inside || {};
            def.inside['md-link'] = linkMd;
        }
    });
}

Prism.hooks.add('wrap', function(env) {
    if (/-link$/.test(env.type)) {
        env.tag = 'a';
        
        var href = env.content;
        var match = env.content.match(linkMd);
            
        href = match[2];

        env.content = match[1];
        env.attributes.href = href;
    }
});

})();
