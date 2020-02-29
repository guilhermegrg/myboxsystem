
{% for formFieldName, fieldName in formFields %}
{% if fieldName in fields|keys %}
{% set foo = fields[fieldName] %}
{% if 'VARCHAR' in foo  %}
{{ include('simpleTextField.php') }}
{% endif %}
{% if 'BOOLEAN' in foo  %}
{{ include('simpleBooleanField.php') }}
{% endif %}
{% endif %}
{% endfor %}


