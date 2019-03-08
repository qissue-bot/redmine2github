---

Original Redmine Comment
{% if author_name %}Author Name: **{{ author_name }}** {% if author_github_username %}({{ author_github_username }}){% endif %}{% endif %}
{% if note_date %}Original Date: {{ note_date }}{% endif %}

---

{{ description }}

{% if attachments|length > 0 -%}
---
{% for attachment in attachments %}
- [{{ attachment.filename }}]({{ attachment.content_url }}) ({{ attachment.author.name }})
{%- endfor %}
{%- endif %}
