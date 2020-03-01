
{% for formFieldName, fieldName in formFields %}
{% if fieldName in fields|keys %}
{% set foo = fields[fieldName] %}
{% if 'VARCHAR' in foo|upper  %}
{{ include('simpleTextField.php') }}
{% endif %}
{% if 'DOUBLE' in foo|upper  %}
{{ include('simpleTextField.php') }}
{% endif %}
{% if 'BOOLEAN' in foo|upper  %}
{{ include('simpleBooleanField.php') }}
{% endif %}
{% endif %}
{% endfor %}


