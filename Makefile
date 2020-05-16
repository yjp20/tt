all: build_sass build_zip

build_sass:
	@echo "Generating CSS from sass file"
	sass ./sass/main.scss ./tt.css

build_zip:
	zip -r tt-theme.zip . -x '*.git*' -x 'sass/bulma/docs/*'
