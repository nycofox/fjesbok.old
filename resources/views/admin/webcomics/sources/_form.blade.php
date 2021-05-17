{{--<x-form-input name="name" label="Name" />--}}
<x-form-input name="homepage" label="Homepage" />
<x-form-input name="searchpage" label="Search page" />
<x-form-input name="baseurl" label="Base URL" />
<x-form-input name="searchstring" label="Search string" />
<x-form-select name="scraper" label="Scraper" :options="$scrapers" />
<x-form-checkbox name="active" label="Active" />

<x-form-submit />
