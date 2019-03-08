---


{% if author_name %}Author Name: **{{ author_name }}** {% if author_github_username %}({{ author_github_username }}){% endif %}{% endif %}
{% if redmine_link %}Original Redmine Issue: {{ redmine_issue_num }}, {{redmine_link}}{% endif %}
{% if start_date %}Original Date: {{ start_date }}{% endif %}
{% if redmine_assignee %}Original Assignee: {{ redmine_assignee }}{% endif %}

---

{{ description }}

{% if attachments|length > 0 -%}
---
{% for attachment in attachments %}
- [{{ attachment.filename }}]({{ attachment.content_url }}) ({{ attachment.author.name }})
{%- endfor %}
{%- endif %}
