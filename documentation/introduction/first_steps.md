# First Steps

## Overview
Since Micro Docs is still in its infancy, setting it up for a new project might be a little intimidating.

## Obtaining the source

You can get the source in two ways: you can either [clone](https://docs.github.com/en/repositories/creating-and-managing-repositories/cloning-a-repository), or download the [Micro Docs GitHub repository](https://github.com/rendeer-pl/MicroDocs) as a ZIP. If you are not familar with Git or GitHub, downloading it as ZIP will work just as well as clone, except you will need to manually update it in the future. To download the current version of Micro Docs, simply open the [GitHub repository](https://github.com/rendeer-pl/MicroDocs), press the green "Code" button and select "Download ZIP".

## Uploading it to your remote directory
Micro Docs will work correctly even if simply copied over to any web-accessible directory; there is no special install step required.

## Setting up the config
Open `config.php` and edit the values of `$address` (remember to include `https://` and skip the ending slash) and `$title`. If you are not planning to modify the source of Micro Docs, set `$DEBUG` to `FALSE`.

## Removing default content
Delete all files in the `documentation` directory. If you ever want to see the default files again, you can browse them in the [Micro Docs' GitHub repository](https://github.com/rendeer-pl/MicroDocs/tree/main/documentation).

## Adding new content
First, you must create an index which will hold the entire document structure. Create a new file in the `documentation` directory and name it `_index.md` (starting with an underscore). In the `_index.md` file, please keep the following syntax:

```
* [Page 1 Title](filename_without_extension]
	* [Sub-page 1 Title](path/filename_without_extension]
	* [Sub-page 2 Title](path/filename_without_extension]
		* [Sub-sub-page 1 Title](path/path/filename_without_extension]
* [Page 2 Title](filename_without_extension]
```

This example setup would translate to the following structure:

1. [Page 1 Title](https://filename_without_extension)
	1. [Sub-page 1 Title](https://path/filename_without_extension)
	1. [Sub-page 2 Title](https://path/filename_without_extension)
		1. [Sub-sub-page 1 Title](https://path/path/filename_without_extension)
1. [Page 2 Title](https://filename_without_extension)

Micro Docs supports up to six levels of hierarchy.

Once you have the `_index.md` file, you can create the actual content in the .md files you included in the index. As of now, the content pages support the full extent of [Markdown](https://www.markdownguide.org/basic-syntax/) formatting without any custom features.
