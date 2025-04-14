def commit_callback(commit):
    if commit.author_email == b"138362568+keerti1924@users.noreply.github.com":
        commit.author_name = b"Ritesh Kumar"
        commit.author_email = b"riteshkumar6022@gmail.com"
    if commit.committer_email == b"138362568+keerti1924@users.noreply.github.com":
        commit.committer_name = b"Ritesh Kumar"
        commit.committer_email = b"riteshkumar6022@gmail.com"
