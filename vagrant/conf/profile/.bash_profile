export CLICOLOR=1
export LSCOLORS=gxBxhxDxfxhxhxhxhxcxcx

export PATH=/usr/local/bin:$PATH
export PATH=/opt/local/bin:/opt/local/sbin:$PATH
export PATH=$PATH:/usr/local/mysql/bin

###################
##    Prompt     ##
###################

function parse_git_branch {
  git branch --no-color 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/\1/'
}
function makePrompt {
    local greyblue="\[\e[30;44m\]"
    local whiteblue="\[\e[37;44m\]"
    local whiteblack="\[\e[37;40m\]"
    local clear="\[\e[0m\]"
    PS1="\n$whiteblue\w$greyblue 𐄊 $whiteblue\t$greyblue 𐄊 $whiteblue\$(parse_git_branch) $clear\n$whiteblack☯ $clear " export PS1;
}
makePrompt

###################
##    Aliases    ##
###################

# -- basic
alias sudo="sudo " # allow sudo to use these aliases
alias l="ls -a"
alias ls="ls -a"
alias ll="ls -alh"
alias top='top -s1 -o cpu -R -F'

# - ack
alias ack="ack-grep"
alias qn="ack -Q"

# - git

# -- iterate
alias j0="git pull"
alias b="git branch"
alias s="git checkout"
alias q="git status"
alias d="git diff"
alias a="git add"
alias dc="git diff --cached"
alias t="git commit"
alias tt="git push"
alias c="git log master..HEAD"
alias chop="git branch -D"
alias log="git log --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"

# -- stash
alias stash="git stash"
alias pop="git stash pop"
alias drop="git stash drop"

# -- show
alias show="git show"
alias showf="git show --pretty='format:' --name-only"

###############
##    Misc   ##
###############

# - ack options
export ACK_OPTIONS="--smart-case -C 2 --type-add html=.tpl --type-add js=.list --type-add css=.list"

. ~/.git-completion.sh