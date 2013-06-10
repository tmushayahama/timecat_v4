select tc_studies.id, firstname, name, type_entry
from tc_user_studies
left join tc_profiles on tc_profiles.user_id = 6
left join tc_studies on tc_studies.id = tc_user_studies.study_id
left join tc_types on tc_types.id = 5;